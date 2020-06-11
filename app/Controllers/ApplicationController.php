<?php

namespace App\Controllers;

use mysqli;
use GUMP;

class ApplicationController
{
    /**
     * Shows all applications
     */
    public function index()
    {
        $mysqli = new mysqli(
            config('database.host'),
            config('database.username'),
            config('database.password'),
            config('database.database'));

        $applications = $mysqli->query('SELECT * FROM applications');

        $mysqli -> close();

        return view('index', ['applications' => $applications]);
    }

    /**
     * Shows form to create a new application
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Validates user input from form and stores data on applications and deals tables accordingly
     */
    public function store()
    {
        $is_valid = GUMP::is_valid($_POST, [
            'email' => ['required', 'valid_email'],
            'amount' => ['required', 'integer', 'min_numeric' => [1]]
        ], [
            'email' => [
                'required' => 'Fill the E-mail field please.',
                'valid_email' => 'E-mail field must be in a valid format (example@example.com).'
            ],
            'amount' => [
                'required' => 'Fill the amount field please.',
                'integer' => 'Amount must be a natural number.',
                'min_numeric' => 'Amount must be greater than zero.'
            ]
        ]);

        if ($is_valid === true) {
            $email = $_POST['email'];
            $amount = $_POST['amount'];

            $mysqli = new mysqli(
                config('database.host'),
                config('database.username'),
                config('database.password'),
                config('database.database'));

            $mysqli->query(
                "
                INSERT INTO applications (email, amount)
                VALUES ('".$email."', '".$amount."')
                "
            );

            $applicationId = $mysqli->insert_id;

            $mysqli->query(
                "
                INSERT INTO deals (partner, application_id)
                VALUES ('".$this->choosePartner($amount)."', '".$applicationId."')
                "
            );

            $mysqli->close();

            $this->mailPartner();

            return redirect('/applications');
        } else {
            return view('/', ['errors' => $is_valid]);
        }
    }

    /**
     * Helper function for choosing partner depending on amount requested
     * @param int $amount
     * @return string
     */
    private function choosePartner(int $amount): string
    {
        switch ($amount) {
            case ($amount <= 5000) :
                $partner = 'B';
                break;
            case ($amount > 5000) :
                $partner = 'A';
                break;
        }

        return $partner;
    }

    /**
     * Method to send email to partner about loan request
     */
    private function mailPartner()
    {
        //TODO Send email to partner about request
    }
}