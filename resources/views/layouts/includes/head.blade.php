<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>inofa - best platform for groups</title>
<link rel="icon" href="{!! asset('limitless/Template/global_assets/images/logo_icon_dark.png') !!}"/>

<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="{{ asset('limitless/Template/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('limitless/Template/global_assets/css/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">

<style>
    .tab-content>.tab-pane {
        display: block;
        height: 0;
        overflow: hidden;
    }
    .tab-content>.tab-pane.active {
        height: auto;
    }
</style>

@yield('librariesCSS')
