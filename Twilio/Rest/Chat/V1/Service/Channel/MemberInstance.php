<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Chat\V1\Service\Channel;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Version;

/**
 * @property string sid
 * @property string accountSid
 * @property string channelSid
 * @property string serviceSid
 * @property string identity
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string roleSid
 * @property integer lastConsumedMessageIndex
 * @property \DateTime lastConsumptionTimestamp
 * @property string url
 */
class MemberInstance extends InstanceResource {
    /**
     * Initialize the MemberInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The service_sid
     * @param string $channelSid The channel_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Chat\V1\Service\Channel\MemberInstance 
     */
    public function __construct(Version $version, array $payload, $serviceSid, $channelSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => $payload['sid'],
            'accountSid' => $payload['account_sid'],
            'channelSid' => $payload['channel_sid'],
            'serviceSid' => $payload['service_sid'],
            'identity' => $payload['identity'],
            'dateCreated' => Deserialize::dateTime($payload['date_created']),
            'dateUpdated' => Deserialize::dateTime($payload['date_updated']),
            'roleSid' => $payload['role_sid'],
            'lastConsumedMessageIndex' => $payload['last_consumed_message_index'],
            'lastConsumptionTimestamp' => Deserialize::dateTime($payload['last_consumption_timestamp']),
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
     * @return \Twilio\Rest\Chat\V1\Service\Channel\MemberContext Context for this
     *                                                            MemberInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new MemberContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['channelSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a MemberInstance
     * 
     * @return MemberInstance Fetched MemberInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the MemberInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the MemberInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return MemberInstance Updated MemberInstance
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
        return '[Twilio.Chat.V1.MemberInstance ' . implode(' ', $context) . ']';
    }
}