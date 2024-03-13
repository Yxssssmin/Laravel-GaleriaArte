<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'cloud_account',
        'cloud_login_type',
        'cloud_password',
        'cloud_merchantId',
        'cloud_agencyId',
        'cloud_token',
    ];

    public function getToken()
    {
        return $this->cloud_token;
    }

    public function updateCloudPassword($token)
    {
        $this->cloud_password = $token;
        $this->save();
    }

    public function updateToken($encryptedPasswd)
    {
        $this->cloud_token = $encryptedPasswd;
        $this->save();
    }

    public function updateCloudMerchantId($merchantId)
    {
        $this->cloud_merchantId = $merchantId;
        $this->save();
    }

    public function updateCloudAgencyId($agencyId)
    {
        $this->cloud_agencyId = $agencyId;
        $this->save();
    }

    public function getCloudAgencyId()
    {
        return $this->cloud_agencyId;
    }

    public function getCloudMerchantId() {
        return $this->cloud_merchantId;
    }

}
