<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadCaptureForm extends Model
{
    use HasFactory;

    public static function getAvailableFields($type)
    {
        $data = [
            'first_name' => [
                'label' => __('Label (First Name)'),
                'default' => [
                    'name' => __('First Name'),
                    'checked' => true,
                    'required' => true,
                ],
            ],
            'last_name' => [
                'label' => __('Label (Last Name)'),
                'default' => [
                    'name' => __('Last Name'),
                    'checked' => true,
                    'required' => true,
                ],
            ],
            'email' => [
                'label' => __('Label (Email)'),
                'default' => [
                    'name' => __('Email'),
                    'checked' => true,
                    'required' => true,
                ],
            ],
            'phone' => [
                'label' => __('Label (Phone)'),
                'default' => [
                    'name' => __('Phone'),
                    'checked' => false,
                    'required' => false,
                ],
            ],
            'company' => [
                'label' => __('Label (Company)'),
                'default' => [
                    'name' => __('Company'),
                    'checked' => false,
                    'required' => false,
                ],
            ],
            'employees' => [
                'label' => __('Label (Employees)'),
                'default' => [
                    'name' => __('Employees'),
                    'checked' => false,
                    'required' => false,
                ],
            ],
            'website' => [
                'label' => __('Label (Website)'),
                'default' => [
                    'name' => __('Website'),
                    'checked' => false,
                    'required' => false,
                ],
            ],
            'address_line_1' => [
                'label' => __('Label (Address Line 1)'),
                'default' => [
                    'name' => __('Address Line 1'),
                    'checked' => false,
                    'required' => false,
                ],
            ],
            'address_line_2' => [
                'label' => __('Label (Address Line 2)'),
                'default' => [
                    'name' => __('Address Line 2'),
                    'checked' => false,
                    'required' => false,
                ],
            ],
            'city' => [
                'label' => __('Label (City)'),
                'default' => [
                    'name' => __('City'),
                    'checked' => false,
                    'required' => false,
                ],
            ],
            'state' => [
                'label' => __('Label (State)'),
                'default' => [
                    'name' => __('State'),
                    'checked' => false,
                    'required' => false,
                ],
            ],
            'postal_code' => [
                'label' => __('Label (Postal Code)'),
                'default' => [
                    'name' => __('Postal Code'),
                    'checked' => false,
                    'required' => false,
                ],
            ],
            'country' => [
                'label' => __('Label (Country)'),
                'default' => [
                    'name' => __('Country'),
                    'checked' => false,
                    'required' => false,
                ],
            ],
            'notes' => [
                'label' => __('Label (Notes)'),
                'default' => [
                    'name' => __('Notes'),
                    'checked' => false,
                    'required' => false,
                ],
            ],
        ];
        switch ($type) {
            case 'freebies':
                break;
        }
        return $data;
    }


}
