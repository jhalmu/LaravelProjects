<x-mail::message>

    # Your post was liked

    {{$liker->name}} liked on of your posts


    <x-mail::button :url="$url" color="success">
        View post
    </x-mail::button>


    Thanks,

    {{ config('app.name') }}


</x-mail::message>
