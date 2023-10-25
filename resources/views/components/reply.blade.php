<div x-data="{ showReplyForm: false }">
    <button @click="showReplyForm = !showReplyForm">Reply</button>

    <div x-show="showReplyForm">
        <form>
            @csrf
            
            <input type="hidden" name="parent_id" value="{{ $parentid }}" />
            <div class="mb-4">
                <label for="name" class="block text-gray-600 mr-2 mb-2">Name:<span class="text-red-600"> *</span> </label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 p-1" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-600 mr-2 mb-2">Email: </label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 p-1" required>
            </div>
            <div class="mb-4">
                <label for="comment" class="block text-gray-600 mr-2 mb-2">Comments:<span class="text-red-600"> *</span>  </label>
                <textarea name="comment" id="comment" rows="4" class="w-full border border-gray-300 p-1" required></textarea>
            </div>
            <textarea placeholder="Your reply"></textarea>
            <button>Submit</button>
        </form>
    </div>
</div>
