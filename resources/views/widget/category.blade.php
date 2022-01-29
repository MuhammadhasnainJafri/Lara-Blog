
                    
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ $category->path() }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach 
                 