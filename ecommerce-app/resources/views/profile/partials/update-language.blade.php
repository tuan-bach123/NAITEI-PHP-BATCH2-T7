<section>
  <select onChange="window.location = this.value;">
    <option value="/language/vi" @if (Session::get('lang') == "vi") selected @endif>
      Tiếng Việt
    </option>
    <option value="/language/en" @if (Session::get('lang') == "en") selected @endif>
      English
    </option>
  </select>
</section>