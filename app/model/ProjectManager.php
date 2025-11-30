<?php

require_once 'Manager.php';

class ProjectManager extends Manager{

    public function getAllProjects(){
        $bdd = $this->connection();

        $request = $bdd->query('SELECT * FROM projects ORDER BY created_at DESC');
        $projects = [];

        while($project = $request->fetch()){
            $projects[]=$project;
        }
        return $projects;
    }

    public function createProject($title, $description, $project_image,$project_url){
        $bdd = $this->connection();
        $request = $bdd->prepare('INSERT INTO projects(title,description,project_image, project_url) VALUES (?,?,?,?)');
        $request->execute([$title,$description,$project_image,$project_url]);
    }

    public function deleteProject($id){
        $bdd = $this->connection();
        $request = $bdd->prepare('DELETE FROM projects WHERE id=?');
        $request->execute([$id]);
    }

    public function getProjectById($id){
        $bdd = $this->connection();
        $request = $bdd->prepare('SELECT * FROM projects WHERE id=?');
        $request->execute([$id]);

        $project = $request->fetch();
        if(!$project){
            return null;
        }
        return $project;
    }

    public function updateProject($id,$title,$description,$project_image,$project_url){
        $bdd = $this->connection();
        $request = $bdd->prepare('UPDATE projects SET title=?, description=?, project_image=?, project_url=? WHERE id=?');
        $request->execute([$title,$description,$project_image,$project_url,$id]);
    }
}