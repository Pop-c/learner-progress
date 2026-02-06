<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrolment;
use Illuminate\Http\Request;


class LearnerProgressController extends Controller{
     /**
     * DESIGN PATTERN: Controller (MVC)
     * This controller handles HTTP requests and prepares data for the view.
     */
    public function index(Request $request){
        /**
         * Read query parameters from URL.
         * Example:
         * /learner-progress?course=Laravel&sort=desc
         */
        $selected_course = $request->get('course');
        $order = $request->get('sort');
        $limit = (int) $request->get('limit', 10);
        $offset = (int) $request->get('offset', 0);
       
         /**
         * Query Builder
         */
        $query = Enrolment::with(['learner', 'course']);

        /**
         * FILTERING LOGIC
         * Only return enrollments where the related course matches.
         */
         if ($selected_course) {
            $query->whereHas('course', function ($q) use ($selected_course) {
                $q->where('name', $selected_course);
            });
        }

       
          /**
         * SORTING LOGIC
         * Sort enrollments by progress percentage.
         */
        if ($order === 'asc' || $order === 'desc') {
            $query->orderBy('progress', $order);
        }

         $enrollments = $query
            ->limit($limit)
            ->offset($offset)
            ->get();

       

        /**
         * Pass data to the view.
         * Controller does NOT format HTML it only prepares data.
         */
        return view('learner-progress', [
            'enrollments' => $enrollments,
            'courses' => Course::all(),
            'selectedCourse' => $selected_course,
            'sortOrder' => $order,
            'limit' => $limit,
            'offset' => $offset,
        ]);


    }


}
