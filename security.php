<?php
class SecurityService
{

    private $formTokenLabel = 'eg-csrf-token-label';

    private $sessionTokenLabel = 'EG_CSRF_TOKEN_SESS_IDX';

    private $post = [];

    private $session = [];

    private $server = [];

    private $excludeUrl = [];

    private $hashAlgo = 'sha256';

    private $hmac_ip = true;

    private $hmacData = 'ABCeNBHVe3kmAqvU2s7yyuJSF2gpxKLC';

    /**
     * NULL is not a valid array type
     *
     * @param array $post
     * @param array $session
     * @param array $server
     * @throws \Error
     */
    public function __construct($excludeUrl = null, &$post = null, &$session = null, &$server = null)
    {
        if (! \is_null($excludeUrl)) {
            $this->excludeUrl = $excludeUrl;
        }
        if (! \is_null($post)) {
            $this->post = & $post;
        } else {
            $this->post = & $_POST;
        }

        if (! \is_null($server)) {
            $this->server = & $server;
        } else {
            $this->server = & $_SERVER;
        }

        if (! \is_null($session)) {
            $this->session = & $session;
        } elseif (! \is_null($_SESSION) && isset($_SESSION)) {
            $this->session = & $_SESSION;
        } else {
            throw new \Error('No session available for persistence');
        }
    }

    /**
     * Insert a CSRF token to a form
     *
     * @param string $lockTo
     *            This CSRF token is only valid for this HTTP request endpoint
     * @param bool $echo
     *            if true, echo instead of returning
     * @return string
     */
    public function insertHiddenToken()
    {
        $csrfToken = $this->getCSRFToken();

        echo "<!--\n--><input type=\"hidden\"" . " name=\"" . $this->xssafe($this->formTokenLabel) . "\"" . " value=\"" . $this->xssafe($csrfToken) . "\"" . " />";
    }

    // xss mitigation functions
    public function xssafe($data, $encoding = 'UTF-8')
    {
        return htmlspecialchars($data, ENT_QUOTES | ENT_HTML401, $encoding);
    }

    /**
     * Generate, store, and return the CSRF token
     *
     * @return string[]
     */
    public function getCSRFToken()
    {
        if (empty($this->session[$this->sessionTokenLabel])) {
            $this->session[$this->sessionTokenLabel] = bin2hex(openssl_random_pseudo_bytes(32));
        }

        if ($this->hmac_ip !== false) {
            $token = $this->hMacWithIp($this->session[$this->sessionTokenLabel]);
        } else {
            $token = $this->session[$this->sessionTokenLabel];
        }
        return $token;
    }

    /**
     * hashing with IP Address removed for GDPR compliance easiness
     * and hmacdata is used.
     *
     * @param string $token
     * @return string hashed data
     */
    private function hMacWithIp($token)
    {
        $hashHmac = \hash_hmac($this->hashAlgo, $this->hmacData, $token);
        return $hashHmac;
    }

    /**
     * returns the current request URL
     *
     * @return string
     */
    private function getCurrentRequestUrl()
    {
        $protocol = "http";
        if (isset($this->server['HTTPS'])) {
            $protocol = "https";
        }
        $currentUrl = $protocol . "://" . $this->server['HTTP_HOST'] . $this->server['REQUEST_URI'];
        return $currentUrl;
    }

    /**
     * core function that validates for the CSRF attempt.
     *
     * @throws \Exception
     */
    public function validate()
    {
        $currentUrl = $this->getCurrentRequestUrl();
        if (! in_array($currentUrl, $this->excludeUrl)) {
            if (! empty($this->post)) {
                $isAntiCSRF = $this->validateRequest();
                if (! $isAntiCSRF) {
                    // CSRF attack attempt
                    // CSRF attempt is detected. Need not reveal that information
                    // to the attacker, so just failing without info.
                    // Error code 1837 stands for CSRF attempt and this is for
                    // our identification purposes.
                    // throw new \Exception("Critical Error! Error Code: 1837.");
                    return false;
                }
                return true;
            }
        }
    }

    /**
     * the actual validation of CSRF happens here and returns boolean
     *
     * @return boolean
     */
    public function isValidRequest()
    {
        $isValid = false;
        $currentUrl = $this->getCurrentRequestUrl();
        if (! in_array($currentUrl, $this->excludeUrl)) {
            if (! empty($this->post)) {
                $isValid = $this->validateRequest();
            }
        }
        return $isValid;
    }

    /**
     * Validate a request based on session
     *
     * @return bool
     */
    public function validateRequest()
    {
        if (! isset($this->session[$this->sessionTokenLabel])) {
            // CSRF Token not found
            return false;
        }

        if (! empty($this->post[$this->formTokenLabel])) {
            // Let's pull the POST data
            $token = $this->post[$this->formTokenLabel];
        } else {
            return false;
        }

        if (! \is_string($token)) {
            return false;
        }

        // Grab the stored token
        if ($this->hmac_ip !== false) {
            $expected = $this->hMacWithIp($this->session[$this->sessionTokenLabel]);
        } else {
            $expected = $this->session[$this->sessionTokenLabel];
        }

        return \hash_equals($token, $expected);
    }

    /**
     * removes the token from the session
     */
    public function unsetToken()
    {
        if (! empty($this->session[$this->sessionTokenLabel])) {
            unset($this->session[$this->sessionTokenLabel]);
        }
    }
}
