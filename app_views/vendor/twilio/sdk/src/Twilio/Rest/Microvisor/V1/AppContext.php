<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Microvisor
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Microvisor\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Version;
use Twilio\InstanceContext;
use Twilio\Rest\Microvisor\V1\App\AppManifestList;


/**
 * @property AppManifestList $appManifests
 * @method \Twilio\Rest\Microvisor\V1\App\AppManifestContext appManifests()
 */
class AppContext extends InstanceContext
    {
    protected $_appManifests;

    /**
     * Initialize the AppContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid A 34-character string that uniquely identifies this App.
     */
    public function __construct(
        Version $version,
        $sid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'sid' =>
            $sid,
        ];

        $this->uri = '/Apps/' . \rawurlencode($sid)
        .'';
    }

    /**
     * Delete the AppInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool
    {

        return $this->version->delete('DELETE', $this->uri);
    }


    /**
     * Fetch the AppInstance
     *
     * @return AppInstance Fetched AppInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): AppInstance
    {

        $payload = $this->version->fetch('GET', $this->uri);

        return new AppInstance(
            $this->version,
            $payload,
            $this->solution['sid']
        );
    }


    /**
     * Access the appManifests
     */
    protected function getAppManifests(): AppManifestList
    {
        if (!$this->_appManifests) {
            $this->_appManifests = new AppManifestList(
                $this->version,
                $this->solution['sid']
            );
        }

        return $this->_appManifests;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get(string $name): ListResource
    {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments): InstanceContext
    {
        $property = $this->$name;
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Microvisor.V1.AppContext ' . \implode(' ', $context) . ']';
    }
}