import CreateDiary from "./pages/CreateDiary.svelte";
import EditDiary from "./pages/EditDiary.svelte";
import Index from "./pages/Index.svelte";
import ViewDiary from "./pages/ViewDiary.svelte";

const routes = {
  "/": Index,
  "/diaries/create": CreateDiary,
  "/diaries/:id": ViewDiary,
  "/diaries/:id/edit": EditDiary,
};

export { routes };
