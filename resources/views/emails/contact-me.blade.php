@component('mail::message')
# A Heading

Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure officiis atque fuga mollitia quis quaerat laudantium ab consectetur id alias.

- A list 
- goes
- here

Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab neque delectus esse sunt cumque iste accusantium cupiditate, tempore commodi! Est.

{{-- @component is just like loading a view but by default it's in vendor mail resource directory. --}}
@component('mail::button', ['url' => 'https://laravelfromscratch.com'])
Visit Laravel From Scratch
@endcomponent
@endcomponent