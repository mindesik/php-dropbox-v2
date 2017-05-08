## Table of contents

- [\MisterPaladin\Dropbox\App](#class-misterpaladindropboxapp)
- [\MisterPaladin\Dropbox\Endpoints\EndpointGroup (abstract)](#class-misterpaladindropboxendpointsendpointgroup-abstract)
- [\MisterPaladin\Dropbox\Endpoints\Files](#class-misterpaladindropboxendpointsfiles)
- [\MisterPaladin\Dropbox\Endpoints\Users](#class-misterpaladindropboxendpointsusers)
- [\MisterPaladin\Dropbox\Exceptions\DropboxAPIException](#class-misterpaladindropboxexceptionsdropboxapiexception)
- [\MisterPaladin\Dropbox\Exceptions\DropboxAppException](#class-misterpaladindropboxexceptionsdropboxappexception)
- [\MisterPaladin\Dropbox\Types\Account](#class-misterpaladindropboxtypesaccount)
- [\MisterPaladin\Dropbox\Types\DeletedMetadata](#class-misterpaladindropboxtypesdeletedmetadata)
- [\MisterPaladin\Dropbox\Types\DropboxType](#class-misterpaladindropboxtypesdropboxtype)
- [\MisterPaladin\Dropbox\Types\FileMetadata](#class-misterpaladindropboxtypesfilemetadata)
- [\MisterPaladin\Dropbox\Types\FolderMetadata](#class-misterpaladindropboxtypesfoldermetadata)
- [\MisterPaladin\Dropbox\Types\SpaceUsage](#class-misterpaladindropboxtypesspaceusage)
- [\MisterPaladin\Dropbox\Types\TemporaryLink](#class-misterpaladindropboxtypestemporarylink)

<hr />

### Class: \MisterPaladin\Dropbox\App

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>string</em> <strong>$accessToken</strong>)</strong> : <em>void</em><br /><em>Add endpoints instances</em> |
| public | <strong>__get(</strong><em>string</em> <strong>$key</strong>)</strong> : <em>mixed</em><br /><em>Access to static properties</em> |
| public static | <strong>getInstance()</strong> : <em>[\MisterPaladin\Dropbox\App](#class-misterpaladindropboxapp)</em><br /><em>Get app instance</em> |
| protected | <strong>__clone()</strong> : <em>void</em> |

<hr />

### Class: \MisterPaladin\Dropbox\Endpoints\EndpointGroup (abstract)

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>mixed</em> <strong>$app</strong>)</strong> : <em>void</em><br /><em>Create new endpoints instance</em> |
| protected | <strong>contentDownloadRequest(</strong><em>mixed</em> <strong>$method</strong>, <em>mixed</em> <strong>$path</strong>, <em>array</em> <strong>$parameters=array()</strong>)</strong> : <em>void</em> |
| protected | <strong>rcpRequest(</strong><em>string</em> <strong>$method</strong>, <em>string</em> <strong>$path</strong>, <em>array</em> <strong>$parameters=array()</strong>)</strong> : <em>mixed</em><br /><em>Create and send request</em> |

<hr />

### Class: \MisterPaladin\Dropbox\Endpoints\Files

| Visibility | Function |
|:-----------|:---------|
| public | <strong>copy(</strong><em>array</em> <strong>$parameters</strong>)</strong> : <em>object</em><br /><em>Copy a file or folder to a different location in the user's Dropbox. If the source path is a folder all its contents will be copied.</em> |
| public | <strong>createFolder(</strong><em>array</em> <strong>$parameters</strong>)</strong> : <em>object</em><br /><em>Create a folder at a given path.</em> |
| public | <strong>delete(</strong><em>array</em> <strong>$parameters</strong>)</strong> : <em>object</em><br /><em>Delete the file or folder at a given path. If the path is a folder, all its contents will be deleted too. A successful response indicates that the file or folder was deleted. The returned metadata will be the corresponding FileMetadata or FolderMetadata for the item at time of deletion, and not a DeletedMetadata object.</em> |
| public | <strong>download(</strong><em>array</em> <strong>$parameters</strong>)</strong> : <em>void</em><br /><em>Download a file from a user's Dropbox.</em> |
| public | <strong>getMetadata(</strong><em>array</em> <strong>$parameters=array()</strong>)</strong> : <em>object</em><br /><em>Returns the metadata for a file or folder. Note: Metadata for the root folder is unsupported.</em> |
| public | <strong>getTemporaryLink(</strong><em>array</em> <strong>$parameters</strong>)</strong> : <em>object</em><br /><em>Get a temporary link to stream content of a file. This link will expire in four hours and afterwards you will get 410 Gone. Content-Type of the link is determined automatically by the file's mime type.</em> |
| protected | <strong>meta(</strong><em>object</em> <strong>$data</strong>)</strong> : <em>object</em><br /><em>Make meta object</em> |

*This class extends [\MisterPaladin\Dropbox\Endpoints\EndpointGroup](#class-misterpaladindropboxendpointsendpointgroup-abstract)*

<hr />

### Class: \MisterPaladin\Dropbox\Endpoints\Users

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getCurrentAccount()</strong> : <em>object</em><br /><em>Get information about the current user's account.</em> |
| public | <strong>getSpaceUsage()</strong> : <em>mixed</em> |

*This class extends [\MisterPaladin\Dropbox\Endpoints\EndpointGroup](#class-misterpaladindropboxendpointsendpointgroup-abstract)*

<hr />

### Class: \MisterPaladin\Dropbox\Exceptions\DropboxAPIException

| Visibility | Function |
|:-----------|:---------|

*This class extends \Exception*

*This class implements \Throwable*

<hr />

### Class: \MisterPaladin\Dropbox\Exceptions\DropboxAppException

| Visibility | Function |
|:-----------|:---------|

*This class extends \Exception*

*This class implements \Throwable*

<hr />

### Class: \MisterPaladin\Dropbox\Types\Account

| Visibility | Function |
|:-----------|:---------|

*This class extends [\MisterPaladin\Dropbox\Types\DropboxType](#class-misterpaladindropboxtypesdropboxtype)*

<hr />

### Class: \MisterPaladin\Dropbox\Types\DeletedMetadata

| Visibility | Function |
|:-----------|:---------|

*This class extends [\MisterPaladin\Dropbox\Types\DropboxType](#class-misterpaladindropboxtypesdropboxtype)*

<hr />

### Class: \MisterPaladin\Dropbox\Types\DropboxType

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>mixed</em> <strong>$attributes</strong>)</strong> : <em>void</em> |

<hr />

### Class: \MisterPaladin\Dropbox\Types\FileMetadata

| Visibility | Function |
|:-----------|:---------|

*This class extends [\MisterPaladin\Dropbox\Types\DropboxType](#class-misterpaladindropboxtypesdropboxtype)*

<hr />

### Class: \MisterPaladin\Dropbox\Types\FolderMetadata

| Visibility | Function |
|:-----------|:---------|

*This class extends [\MisterPaladin\Dropbox\Types\DropboxType](#class-misterpaladindropboxtypesdropboxtype)*

<hr />

### Class: \MisterPaladin\Dropbox\Types\SpaceUsage

| Visibility | Function |
|:-----------|:---------|

*This class extends [\MisterPaladin\Dropbox\Types\DropboxType](#class-misterpaladindropboxtypesdropboxtype)*

<hr />

### Class: \MisterPaladin\Dropbox\Types\TemporaryLink

| Visibility | Function |
|:-----------|:---------|

*This class extends [\MisterPaladin\Dropbox\Types\DropboxType](#class-misterpaladindropboxtypesdropboxtype)*

