  <div class="form-group">
    <select v-model="filters.evento" class="form-control input-sm" name="evento">
        <option v-for="item in info.eventos" :value="item.id">(% item.name %)</option>
    </select>
  </div>   