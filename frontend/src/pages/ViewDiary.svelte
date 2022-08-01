<script lang="ts">
  import { onMount } from "svelte";
  import Axios from "axios";
  import { config } from "../config";
  import { push, link } from "svelte-spa-router";

  export let params: { id: number }, data;

  onMount(async () => {
    let response = await getDiary();

    if (response.status >= 200 && response.status < 300) {
      data = response.data.data;
    } else {
      alert(response.data.message);
      push("/");
    }
  });

  const deleteButtonOnPress = async () => {
    if (confirm("Delete this diary?")) {
      let response = await deleteDiary();

      if (response.status >= 200 && response.status < 300) {
        push("/");
      } else {
        alert(response.data.message);
      }
    }
  };

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

  const deleteDiary = async () => {
    return Axios.delete(`${config.BASE_URL}/diaries/${params.id}`, {
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
</script>

<div class="container mt-3">
  <div class="col-md p-3">
    <a href="/" use:link>
      <button class="btn btn-primary me-1 my-4">Back to Home</button>
    </a>
    {#if data}
      <h2 class="mb-3">{data.title}</h2>
      <p><b>Description:</b> {data.description}</p>
    {:else}
      <p>Loading...</p>
    {/if}
    <a href={`/diaries/${params.id}/edit`} use:link>
      <button class="btn btn-primary me-1 my-4">Edit</button>
    </a>
    <button class="btn btn-danger" on:click={deleteButtonOnPress}>Delete</button
    >
  </div>
</div>
