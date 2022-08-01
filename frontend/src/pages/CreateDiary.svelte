<script lang="ts">
  import Axios from "axios";
  import { config } from "../config";
  import { push, link } from "svelte-spa-router";

  let title, description;

  const onSubmit = async () => {
    let response = await createDiary();

    if (response.status >= 200 && response.status < 300) {
      alert(response.data.message);
      push("/");
    } else {
      alert(response.data.message);
    }
  };

  const createDiary = async () => {
    return Axios.post(
      `${config.BASE_URL}/diaries`,
      { title: title, description: description },
      {
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
      }
    )
      .then(async (response) => {
        return response;
      })
      .catch((error) => {
        return error.response;
      });
  };
</script>

<div class="container mt-3">
  <div class="col-md w-75 p-3">
    <a href="/" use:link>
      <button class="btn btn-primary me-1 my-4">Back to Home</button>
    </a>
    <h2>Create new Diary</h2>
    <form
      class="createDiary"
      on:submit|preventDefault={onSubmit}
      id="createDiary"
    >
      <div class="form-floating my-4">
        <input
          type="text"
          class="form-control"
          id="floatingInputGrid"
          placeholder="Diary Title"
          bind:value={title}
          required
        />
        <label for="floatingInputGrid">Title</label>
      </div>
      <div class="form-floating my-4">
        <textarea
          class="form-control"
          placeholder="Description"
          id="floatingTextarea2"
          style="height: 100px"
          bind:value={description}
          required
        />
        <label for="floatingTextarea2">Description</label>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
</div>
