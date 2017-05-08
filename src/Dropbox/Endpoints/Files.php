<?php

namespace MisterPaladin\Dropbox\Endpoints;

use MisterPaladin\Dropbox\Endpoints\EndpointGroup;
use MisterPaladin\Dropbox\Types\FileMetadata;
use MisterPaladin\Dropbox\Types\FolderMetadata;
use MisterPaladin\Dropbox\Types\DeletedMetadata;
use MisterPaladin\Dropbox\Types\TemporaryLink;

class Files extends EndpointGroup {

    /**
     * Starts returning the contents of a folder. If the result's ListFolderResult.has_more field is true, call list_folder/continue with the returned ListFolderResult.cursor to retrieve more entries.
     * If you're using ListFolderArg.recursive set to true to keep a local cache of the contents of a Dropbox account, iterate through each entry in order and process them as follows to keep your local state in sync:
     * For each FileMetadata, store the new entry at the given path in your local state. If the required parent folders don't exist yet, create them. If there's already something else at the given path, replace it and remove all its children.
     * For each FolderMetadata, store the new entry at the given path in your local state. If the required parent folders don't exist yet, create them. If there's already something else at the given path, replace it but leave the children as they are. Check the new entry's FolderSharingInfo.read_only and set all its children's read-only statuses to match.
     * For each DeletedMetadata, if your local state has something at the given path, remove it and all its children. If there's nothing at the given path, ignore this entry.
     * Note: auth.RateLimitError may be returned if multiple list_folder or list_folder/continue calls with same parameters are made simultaneously by same API app for same user. If your app implements retry logic, please hold off the retry until the previous request finishes.
     *
     * @param array $parameters
     * @return object
     */
    public function listFolder($parameters = [])
    {
        $data = $this->rcpRequest('POST', 'files/list_folder', [
            'json' => $parameters,
        ]);

        return $data;
    }

    /**
     * Copy a file or folder to a different location in the user's Dropbox.
     * If the source path is a folder all its contents will be copied.
     *
     * @param array $parameters
     * @return object
     */
    public function copy($parameters)
    {
        $data = $this->rcpRequest('POST', 'files/copy', [
            'json' => $parameters,
        ]);
        
        return $data;
    }

    /**
     * Create a folder at a given path.
     *
     * @param array $parameters
     * @return object
     */
    public function createFolder($parameters)
    {
        $data = $this->rcpRequest('POST', 'files/create_folder', [
            'json' => $parameters,
        ]);
        
        return new FolderMetadata($data);
    }

    /**
     * Delete the file or folder at a given path.
     * If the path is a folder, all its contents will be deleted too.
     * A successful response indicates that the file or folder was deleted. The returned metadata will be the corresponding FileMetadata or FolderMetadata for the item at time of deletion, and not a DeletedMetadata object.
     *
     * @param array $parameters
     * @return object
     */
    public function delete($parameters)
    {
        $data = $this->rcpRequest('POST', 'files/delete', [
            'json' => $parameters,
        ]);
        
        return $this->meta($data);
    }

    /**
     * Download a file from a user's Dropbox.
     *
     * @param array $parameters
     * @return void
     */
    public function download($parameters)
    {
        $data = $this->contentDownloadRequest('GET', 'files/download', [
            'headers' => [
                'Dropbox-API-Arg' => json_encode($parameters),
            ],
        ]);

        return $data;
    }

    /**
     * Get a temporary link to stream content of a file.
     * This link will expire in four hours and afterwards you will get 410 Gone.
     * Content-Type of the link is determined automatically by the file's mime type.
     * 
     * @param array $parameters
     * @return object
     */
    public function getTemporaryLink($parameters)
    {
        $data = $this->rcpRequest('POST', 'files/get_temporary_link', [
            'json' => $parameters,
        ]);
        
        $data->metadata = new FileMetadata($data->metadata);
        return new TemporaryLink($data);
    }

    /**
     * Returns the metadata for a file or folder.
     * Note: Metadata for the root folder is unsupported.
     *
     * @param array $parameters
     * @return object
     */
    public function getMetadata($parameters = [])
    {
        $data = $this->rcpRequest('POST', 'files/get_metadata', [
            'json' => $parameters,
        ]);
        
        return $this->meta($data);
    }

    /**
     * Make meta object
     *
     * @param object $data
     * @return object
     */
    protected function meta($data)
    {
        switch ($data->{'.tag'}) {
            case 'folder':
                return new FolderMetadata($data);

            case 'file':
                return new FileMetadata($data);

            case 'deleted':
                return new DeletedMetadata($data);
        }
    }
}