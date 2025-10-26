<?php

namespace Xactyl\Http\Requests\Admin\Settings;

use Xactyl\Http\Requests\Admin\AdminFormRequest;

class AdvancedSettingsFormRequest extends AdminFormRequest
{
    /**
     * Return all the rules to apply to this request's data.
     */
    public function rules(): array
    {
        return [
            'recaptcha:enabled' => 'required|in:true,false',
            'recaptcha:secret_key' => 'required|string|max:191',
            'recaptcha:website_key' => 'required|string|max:191',
            'xactyl:guzzle:timeout' => 'required|integer|between:1,60',
            'xactyl:guzzle:connect_timeout' => 'required|integer|between:1,60',
            'xactyl:client_features:allocations:enabled' => 'required|in:true,false',
            'xactyl:client_features:allocations:range_start' => [
                'nullable',
                'required_if:xactyl:client_features:allocations:enabled,true',
                'integer',
                'between:1024,65535',
            ],
            'xactyl:client_features:allocations:range_end' => [
                'nullable',
                'required_if:xactyl:client_features:allocations:enabled,true',
                'integer',
                'between:1024,65535',
                'gt:xactyl:client_features:allocations:range_start',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'recaptcha:enabled' => 'reCAPTCHA Enabled',
            'recaptcha:secret_key' => 'reCAPTCHA Secret Key',
            'recaptcha:website_key' => 'reCAPTCHA Website Key',
            'xactyl:guzzle:timeout' => 'HTTP Request Timeout',
            'xactyl:guzzle:connect_timeout' => 'HTTP Connection Timeout',
            'xactyl:client_features:allocations:enabled' => 'Auto Create Allocations Enabled',
            'xactyl:client_features:allocations:range_start' => 'Starting Port',
            'xactyl:client_features:allocations:range_end' => 'Ending Port',
        ];
    }
}
