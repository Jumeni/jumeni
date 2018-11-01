<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 <script>
     var path = window.location.hostname
     let messages = axios.get(path + '/js/lang.js') // This is default route which can be changed in config
</script>   
<script>
    window.default_locale = "{{ config('app.locale') }}";
    window.fallback_locale = "{{ config('app.fallback_locale') }}";
    window.messages = @json($messages);
</script>
    
</body>
</html>