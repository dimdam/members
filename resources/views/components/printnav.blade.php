<style>
    nav{
  display: flex;
  width: 100%;
  height: 20%;
  background: #eee;
  align-items: center;
  justify-content: center;
}
    </style>
<nav>
    <div class=" sm:px-6 lg:px-8">
        <div class="">
            <div class="flex">
                <!-- Logo -->
                <div class="items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-3 w-auto fill-current text-gray-600" />
                    </a>
                </div>

            </div>

        </div>

</nav>
