<form action="{{route('setLocale', $lang)}}" method="post" class="text-center d-inline">
@csrf

<button class="btn-language" type="submit">
    <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="32" height="32" />
</button>




</form>