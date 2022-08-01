<script lang="ts">
  import { onMount } from "svelte";
  import Axios from "axios";
  import { config } from "../config";
  import { push, link } from "svelte-spa-router";

  export let params: { id: number }, data, title, description;

  onMount(async () => {
    let response = await getDiary();

    if (response.status >= 200 && response.status < 300) {
      data = response.data.data;
      title = data.title;
      description = data.description;
    } else {
      alert(response.data.message);
      push("/");
    }
  });

  const getDiary = async () => {
    return Axios.get(`${config.BASE_URL}/diaries/${params.id}`, {
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
    })
      .then(async (response) => {
        return response;
      })
      .catch((error) => {
        return error.response;
      });
  };

  const onSubmit = async () => {
    let response = await editDiary();

    if (response.status >= 200 && response.status < 300) {
      alert(response.data.message);
      push(`/diaries/${params.id}`);
    } else {
      alert(response.data.message);
    }
  };

  const editDiary = async () => {
    return Axios.put(
      `${config.BASE_URL}/diaries/${params.id}`,
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
    <h2>Edit Diary</h2>
    {#if data}
      <form
        class="editDiary"
        on:submit|preventDefault={onSubmit}
        id="editDiary"
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
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    {:else}
      <p>Loading...</p>
    {/if}
  </div>
</div>
