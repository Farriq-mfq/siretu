<tr>
    <th>Reset sesi pesan</th>
    <td>
        <button class="btn btn-danger btn-outline" wire:click.prevent="handleReset" wire:loading.attr="disabled">
            <span wire:loading.remove>Reset</span>
            <span wire:loading>Loading...</span>
        </button>
    </td>
</tr>
