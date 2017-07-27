@extends('layouts.base')
@section('css')
<link rel='stylesheet' href='/css/apidoc.css' />
<link rel='stylesheet' href='/css/effects.css' />
@endsection
@section('content')
<!-- <div class='well logo-well'>
<img class='logo-img' src='/img/logo.png' />
</div> -->
<div class='about-contents'>
    <h2 id="polr-api-documentation">Polr API Documentation</h2>
    <h2 id="api-keys">API keys</h2>
    <p>To authenticate a user to Polr, you will need to provide an API key along with each request to the Polr API, as a GET or POST parameter. (e.g <code>?key=API_KEY_HERE</code>)</p>
    @if ($role == "admin")
    <h2 id="assigning-an-api-key">Assigning an API key</h2>
    <p>To assign an API key, log on from an administrator account, head over to the &quot;Admin&quot; tab, and scroll to the desired user. From there, you can open the API button dropdown to reset, create, or delete the user's API key. You will also be prompted to set a desired API quota. This is defined as requests per minute. You may allow unlimited requests by making the quota negative. Once the user receives an API key, they will be able to see an &quot;API&quot; tab in their user panel, which provides the information necessary to interact with the API.</p>
    <p>Alternative method: You can also assign a user an API key by editing their entry in the <code>users</code> database table, editing the <code>api_key</code> value to the desired API key, <code>api_active</code> to the correct value (<code>1</code> for active, <code>0</code> for inactive), and <code>api_quota</code> to the desired API quota (see above).</p>
    @endif
    <h2 id="actions">Actions</h2>
    <p>Actions are passed as a segment in the URL. There are currently two actions implemented:</p>
    <ul>
        <li><code>shorten</code> - shortens a URL</li>
        <li><code>lookup</code> - looks up the destination of a shortened URL</li>
    </ul>
    <p>Actions take arguments, which are passed as GET or POST parameters. See <a href="#api-endpoints">API endpoints</a> for more information on the actions.</p>
    <h2 id="response-type">Response Type</h2>
    <p>The Polr API will reply in <code>plain_text</code> or <code>json</code>. The response type can be set by providing the <code>response_type</code> argument to the request. If not provided, the response type will default to <code>plain_text</code>.</p>
    <p>Example <code>json</code> responses:</p>
    <pre><code>{
    &quot;action&quot;: &quot;shorten&quot;,
    &quot;result&quot;: &quot;https://example.com/5kq&quot;
}</code></pre>
    <pre><code>{
    &quot;action&quot;:&quot;lookup&quot;,
    &quot;result&quot;: {
        &quot;long_url&quot;: &quot;https:\/\/google.com&quot;,
        &quot;created_at&quot;: {
            &quot;date&quot;:&quot;2016-02-12 15:20:34.000000&quot;,
            &quot;timezone_type&quot;:3,
            &quot;timezone&quot;:&quot;UTC&quot;
        },
        &quot;clicks&quot;:&quot;0&quot;
    }
}</code></pre>
    <p>Example <code>plain_text</code> responses:</p>
    <p><code>https://example.com/5kq</code></p>
    <p><code>https://google.com</code></p>
    <h2 id="api-endpoints">API Endpoints</h2>
    <p>All API calls will commence with the base URL, <code>/api/v2/</code>.</p>
    <h3 id="apiv2actionshorten">/api/v2/action/shorten</h3>
    <p>Arguments:</p>
    <ul>
        <li><code>url</code>: the URL to shorten (e.g <code>https://google.com</code>)</li>
        <li><code>is_secret</code> (optional): whether the URL should be a secret URL or not. Defaults to <code>false</code>. (e.g <code>true</code> or <code>false</code>)</li>
        <li><code>custom_ending</code> (optional): a custom ending for the short URL. If left empty, no custom ending will be assigned.</li>
    </ul>
    <p>Response: A JSON or plain text representation of the shortened URL.</p>
    <p>Example: GET <code>http://example.com/api/v2/action/shorten?key=API_KEY_HERE&amp;url=https://google.com&amp;custom_ending=CUSTOM_ENDING&amp;is_secret=false</code> Response:</p>
    <pre><code>{
    &quot;action&quot;: &quot;shorten&quot;,
    &quot;result&quot;: &quot;https://example.com/5kq&quot;
}</code></pre>
    <p>Remember that the <code>url</code> argument must be URL encoded.</p>
    <h3 id="apiv2actionlookup">/api/v2/action/lookup</h3>
    <p>The <code>lookup</code> action takes a single argument: <code>url_ending</code>. This is the URL to lookup. If it exists, the API will return with the destination of that URL. If it does not exist, the API will return with the status code 404 (Not Found).</p>
    <p>Arguments:</p>
    <ul>
        <li><code>url_ending</code>: the link ending for the URL to look up. (e.g <code>5ga</code>)</li>
        <li><code>url_key</code> (optional): optional URL ending key for lookups against secret URLs</li>
    </ul>
    <p>Remember that the <code>url</code> argument must be URL encoded.</p>
    <p>Example: GET <code>http://example.com/api/v2/action/lookup?key=API_KEY_HERE&amp;url_ending=2</code> Response:</p>
    <pre><code>{
    &quot;action&quot;: &quot;lookup&quot;,
    &quot;result&quot;: &quot;https://google.com&quot;
}</code></pre>
    <h2 id="http-error-codes">HTTP Error Codes</h2>
    <p>The API will return an error code if your request was malformed or another error occured while processing your request.</p>
    <h3 id="http-400-bad-request">HTTP 400 Bad Request</h3>
    <p>This status code is returned in the following circumstances:</p>
    <ul>
        <li>By the <code>shorten</code> endpoint
            <ul>
                <li>In the event that the custom ending provided is already in use, a <code>400</code> error code will be returned and the message <code>custom ending already in use</code> will be returned as an error.</li>
            </ul></li>
        <li>By any endpoint
            <ul>
                <li>Your request will return a <code>400</code> if it is malformed or the contents of your arguments do not fit the required data type.</li>
            </ul></li>
    </ul>
    <h3 id="http-500-internal-server-error">HTTP 500 Internal Server Error</h3>
    <ul>
        <li>By any endpoint
            <ul>
                <li>The server has encountered an unhandled error. This is most likely due to a problem with your configuration or your server is unable to handle the request due to a bug.</li>
            </ul></li>
    </ul>
    <h3 id="http-401-unauthorized">HTTP 401 Unauthorized</h3>
    <ul>
        <li>By any endpoint
            <ul>
                <li>You are unauthorized to make the transaction. This is most likely due to an API token mismatch, or your API token has not be set to active.</li>
            </ul></li>
        <li>By the <code>lookup</code> endpoint
            <ul>
                <li>You have not provided the valid <code>url_key</code> for a secret URL lookup.</li>
            </ul></li>
    </ul>
    <h3 id="http-404-not-found">HTTP 404 Not Found</h3>
    <ul>
        <li><p>By the <code>lookup</code> endpoint</p>
            <ul>
                <li>Returned in the circumstance that the short URL to look up was not found in the database.</li>
            </ul></li>
    </ul>
    <h3 id="http-403-forbidden">HTTP 403 Forbidden</h3>
    <ul>
        <li>By the <code>shorten</code> endpoint
            <ul>
                <li>Your request was understood, but you have exceeded your quota.</li>
            </ul></li>
    </ul>
    <h2 id="error-responses">Error Responses</h2>
    <p>Example <code>json</code> error response:</p>
    <pre><code>{
    &quot;error&quot;: &quot;custom ending already in use&quot;
}</code></pre>
    <p>Example <code>plain_text</code> error response:</p>
    <p><code>custom ending already in use</code></p>
</div>
@endsection
@section('js')
  <script src='/js/about.js'>
  </script>@endsection
