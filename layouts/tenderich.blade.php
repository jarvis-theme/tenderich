<!DOCTYPE html>
<html lang="en">
    <head>
        {{ Theme::partial('seostuff') }}
        {{ Theme::partial('defaultcss') }}
        {{ Theme::asset()->styles() }}
        <style type="text/css">#tag-category{padding-left: 5px}</style>
    </head>
    <body>
        {{ Theme::partial('header') }}
        {{ Theme::partial('slider') }}
        <div class="container">
            {{ Theme::place('content') }}
        </div>
        {{ Theme::partial('footer') }}
        {{ Theme::partial('defaultjs') }}   
        {{ Theme::partial('analytic') }}
    </body>
</html>