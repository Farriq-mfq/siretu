 <div class="card">
     <div class="card-header">
         <a href="{{ route('personil') }}">Kembali</a>
         <p class="card-description mt-3">
             Yakin ingin reset semua data siswa ?
         </p>
     </div>
     <div class="card-body">
         <button wire:click.prevent="handleReset" class="btn btn-outline-danger" type="button"
             wire:loading.attr="disabled">
             <span wire:loading.remove>
                 Reset personil
             </span>
             <span wire:loading>
                 Reseting...
             </span>
         </button>
     </div>
 </div>
