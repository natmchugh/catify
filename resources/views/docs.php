<!-- View stored in resources/views/docs.php -->

<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">

        <script type="text/javascript" src="/static/catify.js"></script>

    </head>
    <body>
        <div class="container">

        <h1>Catify</h1>
        <h2>Animated Gifs of Cats as a Service</h2>
         <hr>
        <h3>Search</h3>

        <form>
            <p>
                <h5>Host</h5>
                <?= getenv('APP_URL'); ?>
            </p>
            <p>
                <h5>Path</h5>
                /api/search
            </p>
            <p>
                <h5>Description</h5>
                Search through a library of several animated cat gifs
            </p>
            <table>
                <thead>
                    <tr>
                        <th>Arguments</th>
                        <th>Required</th>
                        <th>Location</th>
                        <th>Example</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                            <td>API-TOKEN</td>
                            <td>Yes</td>
                            <td>Header</td>
                            <td>VALIDTOKEN</td>
                            <td><input type="text" id="search.API-TOKEN"></td>
                    </tr>
                    <tr>
                            <td>Search</td>
                            <td>No</td>
                            <td>URL Param</td>
                            <td>Typing</td>
                            <td><input type="text" id="search.search"></td>
                    </tr>
                </tbody>
            </table>
            <input type="button" name="submit" value="Try It!" onclick="doSearch();"/>
            <h4>Request</h4>
             <pre>
                <code>
                    <div id="search.requestUrl"></div>
                </code>
            </pre>
            <h4>Response</h4>
            <pre>
                <code>
                    <div id="search.jsonResponse"></div>
                </code>
            </pre>
            <div id="search.gifs"></div>
        </form>
        <hr>
        <h3>Random</h3>
               <form>
            <p>
                <h5>Host</h5>
                <?= getenv('APP_URL'); ?>
            </p>
            <p>
                <h5>Path</h5>
                /api/random
            </p>
            <p>
                <h5>Description</h5>
                Get a random gif
            </p>
            <table>
                <thead>
                    <tr>
                        <th>Arguments</th>
                        <th>Required</th>
                        <th>Location</th>
                        <th>Example</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                            <td>API-TOKEN</td>
                            <td>Yes</td>
                            <td>Header</td>
                            <td>VALIDTOKEN</td>
                            <td><input type="text" id="random.API-TOKEN"></td>
                    </tr>
                </tbody>
            </table>
            <input type="button" name="submit" value="Try It!" onclick="doRandom();"/>
            <h4>Request</h4>
             <pre>
                <code>
                    <div id="random.requestUrl"></div>
                </code>
            </pre>
            <h4>Response</h4>
            <pre>
                <code>
                    <div id="random.jsonResponse"></div>
                </code>
            </pre>
            <div id="random.gifs"></div>
        </form>
    </div>
    </body>
</html>