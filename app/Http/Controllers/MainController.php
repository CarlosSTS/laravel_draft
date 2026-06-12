<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome()
    {
        return response()->json([
            'message' => 'Welcome to the API created with Laravel.'
        ]);
    }

    public function currentTime()
    {
        return response()->json([
            'message' => 'Current server time: ' . now()->toTimeString()
        ]);
    }

    public function currentDate()
    {
        return response()->json([
            'message' => 'Current server date: ' . now()->toDateString()
        ]);
    }

    public function greetClient($name)
    {
        return response()->json([
            'message' => 'Hello, ' . ucfirst($name) . '! Welcome to our Laravel API.'
        ]);
    }

    public function sum(Request $request)
    {
        $value1 = $request->input('value1');
        $value2 = $request->input('value2');
        $sum = $value1 + $value2;
        return response()->json([
            'message' => "{$value1} + {$value2} = {$sum}"
        ]);
    }

    public function storeContact(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        // append to contacts.txt
        $newContact = [
            'name' => $name,
            'email' => $email
        ];

        file_put_contents(storage_path('contacts.txt'), json_encode($newContact) . PHP_EOL, FILE_APPEND);

        return response()->json([
            'message' => "Contact {$name} with email {$email} stored successfully."
        ]);
    }

    public function getContacts()
    {
        $contactsFile = storage_path('contacts.txt');

        if (!file_exists($contactsFile)) {
            return response()->json([
                'status' => 'error',
                'message' => 'No contacts found.'
            ]);
        }

        $file = fopen($contactsFile, 'r');
        $contacts = [];
        while (($line = fgets($file)) != false) {
            $contacts[] = json_decode($line, true);
        }
        fclose($file);
        return response()->json([
            'status' => 'success',
            'contacts' => $contacts
        ]);
    }

    public function clearContacts()
    {
        $contactsFile = storage_path('contacts.txt');

        if (file_exists($contactsFile)) {
            unlink($contactsFile);
            return response()->json([
                'message' => 'All contacts have been successfully removed.'
            ]);
        }

        return response()->json([
            'message' => 'There were no contacts to remove.'
        ]);
    }
}
