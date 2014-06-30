<?php

class DashBoardController extends \BaseController {

	/**
	 * El home del sitio
	 *
	 * @return Response
	 */

	public function home()
	{
        return View::make('home');
	}

}
