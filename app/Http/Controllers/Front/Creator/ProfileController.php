<?php

namespace App\Http\Controllers\Front\Creator;

use App\Http\Controllers\Controller;
use App\Service\Project\ProjectServiceInterface;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    private $projectService;

    private $userService;
    public function __construct(ProjectServiceInterface $projectService, UserServiceInterface $userService)
    {
        $this->projectService = $projectService;
        $this->userService = $userService;
    }
    public function index()
    {
        $creator = Auth::user()->id;
        $projects = $this->projectService->getRelatedProjects($creator);
        return view('front.creator.profile.index', compact('projects'));
    }

    public function edit($profile)
    {
        $creator = $this->userService->find($profile);
        return view('front.creator.profile.edit', compact('creator'));
    }

    public function update(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required |string |max:255',
            'email' => 'required |email |max:255',
        ]);
        //Check error
        if($validated->fails()){
            return response()->json(['code' => 400, 'msg' => $validated->errors()->first()]);
        }
        # Check if the request has profile image
        if($request->hasFile('avatar')) {
            $avatarPath = 'storage/' .auth()->user()->avatar;
            if(File::exists($avatarPath)){
                # Delete old avatar
                File::delete($avatarPath);
            }
            $avatar = $request->avatar->store('avatars', 'public');
        }
        $data = $request->all();
        $data['avatar'] = $avatar ?? auth()->user()->avatar;
        $this->userService->update($id, $data);
        return response()->json(['code' => 200, 'msg' => 'Profile updated successfully']);
        // return redirect()->route('profile.index');
    }
}
