<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Language') }}
        </h2>
    </header>
    <select class="rounded-md mt-4" onChange="window.location = this.value;"">
      <option 
        value="/language/vi"
        @if (Session::get('lang') == "vi")
          selected
        @endif
      >
        Tiếng Việt
      </option>
      <option 
        value="/language/en"
        @if (Session::get('lang') == "en")
          selected
        @endif
      >
        English
      </option>
    </select>
</section>
