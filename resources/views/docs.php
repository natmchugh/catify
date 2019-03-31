<!-- View stored in resources/views/docs.php -->

<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">

        <script type="text/javascript" src="/static/catify.js"></script>

    </head>
    <body>
        <h1>Catify</h1>
        <h2>Animated Gifs of Cats as a Service</h2>

        <h3>Search</h3>

        <form>
            <fieldset>
            <label for="search.search">Search</label><input type="text" id="search.search">
            <label for="search.API-TOKEN">API-TOKEN</label><input type="text" id="search.API-TOKEN">
            <input type="button" name="submit" value="Try It!" onclick="doSearch();"/>
            </fieldset>
            <div id="search.jsonResponse"></div>
            <div id="search.gifs"></div>
        </form>

        <h3>Random</h3>
        <form>
            <fieldset>
            <label for="random.API-TOKEN">API-TOKEN</label><input type="text" id="random.API-TOKEN">
            <input type="button" name="submit" value="Try It!" onclick="doRandom();"/>
            </fieldset>
            <div id="random.jsonResponse"></div>
            <div id="random.gifs"></div>
        </form>
    </body>
</html>