<!DOCTYPE HTML>
<html lang="ja" style="height:100%;">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>post_detail</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>timeline</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        {{ $post->post }}
    </body>