<?php

namespace App\Controllers;

use mysqli;

class DealsController
{
    /**
     * Shows all deals
     */
    public function deals()
    {
        $mysqli = new mysqli(
            config('database.host'),
            config('database.username'),
            config('database.password'),
            config('database.database'));

        $deals = $mysqli->query('SELECT * FROM deals');

        $mysqli -> close();

        return view('deals', ['deals' => $deals]);
    }

    /**
     * Imitates the functionality of sending an offer to a client
     */
    public function offerDeal()
    {
        $id = $_POST['application_id'];
        $status = $_POST['status'];

        if ($status == 'ask') {
            $mysqli = new mysqli(
                config('database.host'),
                config('database.username'),
                config('database.password'),
                config('database.database'));

            $mysqli->query(
                "
                UPDATE deals
                SET status='offer'
                WHERE application_id = '".$id."'
                "
            );

            $mysqli->query(
                "
                UPDATE applications
                SET offer_received=true
                WHERE id = '".$id."'
                "
            );

            $mysqli->close();

            $this->mailClient();

            return redirect('/deals');
        } else {
            return redirect('/deals');
        }
    }

    /**
     * Method to send approved email to client
     */
    private function mailClient()
    {
        //TODO Send email to client about offer
    }
}