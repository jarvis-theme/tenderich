<!DOCTYPE html>
<html lang="en">
    <head>
        {{ Theme::partial('seostuff') }}
        {{ Theme::asset()->styles() }}
        {{ Theme::partial('defaultcss') }}
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