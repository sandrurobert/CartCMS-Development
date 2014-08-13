<?php

  View::composer('top_bar', function ($view)
  {
    $tasks = Task::where('sent_to_id', '=', Auth::user()->id)->paginate(5);   

    $view->with('tasks', $tasks);
  });

