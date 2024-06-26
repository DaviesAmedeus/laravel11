<x-layout>
    <x-slot:heading>Job Listings</x-slot:heading>
   
       <div class="space-y-4">
        @foreach ($jobs as $job )
        
        <a href="jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
            <div class="font-bold text-blue-500 txt-sm">{{ $job->employer->name }}</div>
            <strong>{{ $job['title'] }}</strong> pays {{ $job['salary'] }}
        </a>
      @endforeach
       </div> 

       <div class="pt-3">
        {{ $jobs->links() }}
       </div>
   
   
</x-layout>