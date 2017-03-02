<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\IpMessaging\V1\Service\Channel;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Version;

/**
 * @property string sid
 * @property string accountSid
 * @property string attributes
 * @property string serviceSid
 * @property string to
 * @property string channelSid
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property boolean wasEdited
 * @property string from
 * @property string body
 * @property integer index
 * @property string url
 */
class MessageInstance extends InstanceResource {
    /**
     * Initialize the MessageInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The service_sid
     * @param string $channelSid The channel_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\IpMessaging\V1\Service\Channel\MessageInstance 
     */
    public function __construct(Version $version, array $payload, $serviceSid, $channelSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => $payload['sid'],
            'accountSid' => $payload['account_sid'],
            'attributes' => $payload['attributes'],
            'serviceSid' => $payload['service_sid'],
            'to' => $payload['to'],
            'channelSid' => $payload['channel_sid'],
            'dateCreated' => Deserialize::dateTime($payload['date_created']),
            'dateUpdated' => Deserialize::dateTime($payload['date_updated']),
            'wasEdited' => $payload['was_edited'],
            'from' => $payload['from'],
            'body' => $payload['body'],
            'index' => $payload['index'],
            'url' => $payload['url'],
        );

        $this->solution = array(
            'serviceSid' => $serviceSid,
            'channelSid' => $channelSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\IpMessaging\V1\Service\Channel\MessageContext Context
     *                                                                    for this
     *                                                                    MessageInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new MessageContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['channelSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a MessageInstance
     * 
     * @return MessageInstance Fetched MessageInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the MessageInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the MessageInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return MessageInstance Updated MessageInstance
     */
    public function update($options = array()) {
        return $this->proxy()->update(
            $options
        );
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.IpMessaging.V1.MessageInstance ' . implode(' ', $context) . ']';
    }
}