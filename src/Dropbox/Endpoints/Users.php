<?php

namespace MisterPaladin\Dropbox\Endpoints;

use MisterPaladin\Dropbox\Endpoints\EndpointGroup;
use MisterPaladin\Dropbox\Types\Account;
use MisterPaladin\Dropbox\Types\SpaceUsage;

class Users extends EndpointGroup {

    /**
     * Get information about the current user's account.
     *
     * @return object
     */
    public function getCurrentAccount()
    {
        $data = $this->rcpRequest('POST', 'users/get_current_account');
        return new Account($data);
    }

    public function getSpaceUsage()
    {
        $data = $this->rcpRequest('POST', 'users/get_space_usage');
        return new SpaceUsage($data);
    }
}