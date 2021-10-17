<label for="query">Search movie</label><br/>
<input type="search"
       list="search-result"
       value="{{ $query ?? '' }}"
       name="query"
       id="search-box"
       placeholder="Type and hit Enter..."
       type="text">

<datalist id="search-result">
</datalist>

