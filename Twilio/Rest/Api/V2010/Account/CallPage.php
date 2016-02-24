<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Page;
use Twilio\Values;

class CallPage extends Page {
    public function __construct($version, $response, $solution) {
        parent::__construct($version, $response);
        
        // Path Solution
        $this->solution = $solution;
    }

    /**
     * Create a new CallInstance
     * 
     * @param string $to Phone number, SIP address or client identifier to call
     * @param string $from Twilio number from which to originate the call
     * @param array $options Optional Arguments
     * @return CallInstance Newly created CallInstance
     */
    public function create($to, $from, array $options = array()) {
        $options = new Values($options);
        
        $data = Values::of(array(
            'To' => $to,
            'From' => $from,
            'Url' => $options['url'],
            'ApplicationSid' => $options['applicationSid'],
            'Method' => $options['method'],
            'FallbackUrl' => $options['fallbackUrl'],
            'FallbackMethod' => $options['fallbackMethod'],
            'StatusCallback' => $options['statusCallback'],
            'StatusCallbackMethod' => $options['statusCallbackMethod'],
            'SendDigits' => $options['sendDigits'],
            'IfMachine' => $options['ifMachine'],
            'Timeout' => $options['timeout'],
            'Record' => $options['record'],
        ));
        
        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new CallInstance(
            $this->version,
            $payload,
            $this->solution['accountSid']
        );
    }

    /**
     * Streams CallInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     * 
     * @param array $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param int $pageSize Number of records to fetch per request, when not set
     *                      will use
     *                      the default value of 50 records.  If no page_size is
     *                      defined
     *                      but a limit is defined, stream() will attempt to read
     *                      the
     *                      limit with the most efficient page size, i.e.
     *                      min(limit, 1000)
     * @return \Twilio\Stream stream of results
     */
    public function stream(array $options = array(), $limit = null, $pageSize = null) {
        $limits = $this->version->readLimits($limit, $pageSize);
        
        $page = $this->page(
            $options, 
        $limits['pageSize']);
        
        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads CallInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     * 
     * @param array $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param int $pageSize Number of records to fetch per request, when not set
     *                      will use
     *                      the default value of 50 records.  If no page_size is
     *                      defined
     *                      but a limit is defined, read() will attempt to read the
     *                      limit with the most efficient page size, i.e.
     *                      min(limit, 1000)
     * @return CallInstance[] Array of results
     */
    public function read(array $options = array(), $limit = null, $pageSize = Values::NONE) {
        return iterator_to_array($this->stream(
            $options, 
        $limit, $pageSize));
    }

    /**
     * Retrieve a single page of CallInstance records from the API.
     * Request is executed immediately
     * 
     * @param array $options Optional Arguments
     * @param int $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param int $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of CallInstance
     */
    public function page(array $options = array(), $pageSize = Values::NONE, $pageToken = Values::NONE, $pageNumber = Values::NONE) {
        $options = new Values($options);
        $params = Values::of(array(
            'To' => $options['to'],
            'From' => $options['from'],
            'ParentCallSid' => $options['parentCallSid'],
            'Status' => $options['status'],
            'StartTime<' => $options['starttimeBefore'],
            'StartTime' => $options['startTime'],
            'StartTime>' => $options['starttimeAfter'],
            'EndTime<' => $options['endtimeBefore'],
            'EndTime' => $options['endTime'],
            'EndTime>' => $options['endtimeAfter'],
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ));
        
        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );
        
        return new CallPage($this->version, $response, $this->solution);
    }

    public function buildInstance(array $payload) {
        return new CallInstance(
            $this->version,
            $payload,
            $this->solution['accountSid']
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.CallPage]';
    }
}