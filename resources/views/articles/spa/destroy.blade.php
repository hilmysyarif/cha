<a class="btn btn-xs btn-danger" v-on:click="destroy(active)" v-show="state == 'deletion'">
  <span class="glyphicon glyphicon-remove"></span> Delete now
</a>
<a class="btn btn-xs btn-default" v-on:click="setState('normal')" v-show="state == 'deletion'">
  Cancel <span class="glyphicon glyphicon-share-alt"></span>
</a>