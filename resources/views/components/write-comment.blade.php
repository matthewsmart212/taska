<form method="POST" action="/tasks/{{ $task->id }}/comment">
    @csrf

    <textarea
        class="w-full border-0"
        placeholder="Write a new comment ..."
        name="comment"
        required
    ></textarea>

    @error('body')
    <p class="text-red-500 text-sm mt-4">{{ $message }}</p>
    @enderror

    <hr class="my-4" />

    <footer class="flex justify-between">
        <img
            src="/images/profile-pic.png"
            alt="your avatar"
            class="rounded-full mr-2"
            width="40"
            height="40"
        />

        <button
            type="submit"
            class="bg-gray-500 rounded-lg shadow p-2 text-white"
        >
            Submit
        </button>
    </footer>
</form>
