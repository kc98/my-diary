<script lang="ts">
  import "bootstrap/dist/css/bootstrap.min.css";
  import "bootstrap/dist/js/bootstrap.bundle";
  import "datatables.net-bs5/css/dataTables.bootstrap5.min.css";
  import Router from "svelte-spa-router";
  import { routes } from "./routes";
  import initDt from "datatables.net-bs5";

  initDt();
</script>

<Router {routes} />
