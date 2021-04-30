<?php

namespace App\Http\Controllers\Traits;

use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadTraits
{
    public $PHOTOS_HOME = "photos/";

    public $DOCUMENTS_HOME = "documents/";

    /**
     * Upload user's passport photograph
     *
     * @param  \App\Models\User  $user
     * @return $mixed
     */
    public function uploadPassport(UploadedFile $passport, User $user)
    {
        $name = Str::slug($user->first_name) . "_-_passport"; // brendan_-_passport.jpg
        $extension = '.' . $passport->getClientOriginalExtension(); // .jpg
        // photos/brendan/brendan_-_passport.jpg
        $path = $this->PHOTOS_HOME . Str::slug($user->first_name) . '/' . $name . $extension;

        // Store uploaded Passport (set visibility = PUBLIC)
        $passport->storePubliclyAs(
            $this->PHOTOS_HOME . Str::slug($user->first_name), // This is the root folder path
            $name . $extension,
        );

        // Update file visibility
        Storage::setVisibility($path, 'public');

        // Create or Update user's Passport photo
        $passportPhoto = $user->passportPhoto()->updateOrCreate([
            'name' => $name . $extension,
        ]);

        // dd($passportPhoto->uploads()->get());

        // Create or Update uploadable
        $passportPhoto->uploads()->updateOrCreate([
            'url' => $path,
            'description' => "{$user->first_name}'s Passport Photograph.",
        ]);
    }

    public function uploadDocuments(User $user, Scholarship $scholarship, UploadedFile ...$documents)
    {
        // Empty Documents Directory before updating
        // Storage::deleteDirectory($this->DOCUMENTS_HOME);

        foreach ($documents as $index => $doc) {
            $document_name = Str::slug($user->first_name) . "_-_document_-_" . $index; // brendan_-_document_-_0.jpg
            $document_extension = '.' . $doc->getClientOriginalExtension(); // .docx/.pdf
            // documents/brendan/brendan_-_document_-_0.jpg
            $path = $this->DOCUMENTS_HOME . Str::slug($user->first_name) . '/' . $document_name . $document_extension;

            // Store/Upload Document (set visibility = PUBLIC)
            $doc->storePubliclyAs(
                $this->DOCUMENTS_HOME . Str::slug($user->first_name), // This is the root folder path
                $document_name . $document_extension,
            );

            // Update file visibility
            Storage::setVisibility($path, 'public');

            // Create or Update Scholarship documents
            $uploadedDocument = $scholarship->documents()->updateOrCreate([
                'name' => $document_name . $document_extension,
            ]);

            $uploadedDocument->uploads()->updateOrCreate([
                'url' => $path,
                'description' => "{$user->first_name}'s Document.",
            ]);
        }
    }
}
