<?php

namespace Klaviyo;

use Klaviyo\Model\ProfileModel;

class Track extends KlaviyoBase
{
    /**
     * Track Class constants
     */
    const TRACK = 'track';
    const IDENTIFY = 'identify';

    public function __construct($public_key, $private_key, $host = self::HOST) {
        parent::__construct($public_key, $private_key, $host = self::HOST);

        if ( !isset( $this->public_key ) ) {
            throw new KlaviyoException('Public key is not defined.');
        }
    }

    public function trackEvent( $payload ) {
        $options = [self::QUERY => $payload];
        
        return $this->publicRequest( self::TRACK, $options );
    }

    public function identifyProfile ( ProfileModel $profile ) {
        $options = [self::QUERY => [self::PROPERTIES => $profile]];

        return $this->publicRequest( self::IDENTIFY, $options );
    }
}