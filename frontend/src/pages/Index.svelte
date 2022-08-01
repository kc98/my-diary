<script lang="ts">
  import { onMount } from "svelte";
  import jQuery from "jquery";
  import Axios from "axios";

  let el, table;

  onMount(async () => {
    table = jQuery(el).DataTable({
      ajax: "http://localhost:8000/api/diaries",
      columns: [
        { data: "id" },
        { data: "title" },
        {
          data: (row) => {
            //todo: proper format date
            return new Date(row.updated_at);
          },
        },
        {
          data: (row) => {
            return `<a href='/#/diaries/${row.id}'><button class='btn btn-primary me-1'>View</button></a>`;
          },
        },
      ],
    });
  });
</script>

<div class="container">
  <div class="row mt-2">
    <h2>My diaries</h2>
  </div>
  <div class="row mt-1">
    <div class="row mb-3">
      <div class="col">
        <a href="/#/diaries/create">
          <button class="btn btn-primary me-1">Create Diary</button>
        </a>
      </div>
    </div>
    <table
      bind:this={el}
      class="display table table-striped"
      style="width:100%"
    >
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Updated At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody />
    </table>
  </div>
</div>
