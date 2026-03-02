# Git Industry Level Commands Documentation

## 1. Git Configuration Commands

### git config --global user.name

**Syntax:**
git config --global user.name "Your Name"

**Purpose:**
Sets the global username that will appear in your Git commits.

**Example:**
git config --global user.name "Mohitha-220321"

**Output Screenshot:**
![git init screenshot](userName.png)


### git config --global user.email

**Syntax:**
git config --global user.email

**Purpose:**
Sets the global email address that will appear in your Git commits.

**Example:**
git config --global user.email 

**Output Screenshot:**
![git init screenshot](email.png)


### git config --list

**Purpose:**
Displays all the Git configuration settings currently applied.

**Output Screenshot:**
![git init screenshot](list.png)


## Repository set up commands

### git init

**Purpose:**
Creates a new Git repository in the current folder.

**Output Screenshot:**
![git init screenshot](gitinit.png)


### git clone

**Purpose:**
Copies an existing remote repository to your local system.

**Output Screenshot:**
![git init screenshot](clone.png)


### git clone --branch

**Purpose:**
Clones a specific branch from a remote repository.

**Output Screenshot:**
![git init screenshot](branch.png)


### git clone --depth

**Purpose:**
Clones a repository with limited commit history (shallow clone).

**Output Screenshot:**
![git init screenshot](depth.png)


## Repository Status & Inspection

### git status

**Purpose:**
Shows the current state of files (modified, staged, and untracked).

**Output Screenshot:**
![git init screenshot](status.png)


### git log

**Purpose:**
Displays the complete commit history of the repository.

**Output Screenshot:**
![git init screenshot](gitlog.png)


### git log --oneline

**Purpose:**
Shows commit history in a short one-line format.

**Output Screenshot:**
![git init screenshot](commit_oneline.png)


### git log --graph

**Purpose:**
Displays commit history in a visual branch graph format.

**Output Screenshot:**
![git init screenshot](graph.png)


### git show

**Purpose:**
Shows detailed information about a specific commit.

**Output Screenshot:**
![git init screenshot](show.png)


### git diff

**Purpose:**
Shows changes made in files that are not yet staged.

**Output Screenshot:**
![git init screenshot](diff.png)


### git diff --staged

**Purpose:**
Shows changes that are staged but not yet committed.

**Output Screenshot:**
![git init screenshot](diff_staged.png)


### git blame

**Purpose:**
Shows who last modified each line of a file.

**Output Screenshot:**
![git init screenshot](blame.png)


### git reflog

**Purpose:**
Displays the history of all HEAD movements and actions.

**Output Screenshot:**
![git init screenshot](reflog.png)


### git shortlog

**Purpose:**
Summarizes commit history grouped by author.

**Output Screenshot:**
![git init screenshot](shortlog.png)

## file tracking commands

### git add

**Purpose:**
Adds a specific file to the staging area so it can be included in the next commit.

**Output Screenshot:**
![git init screenshot](add.png)

### git add .

**Purpose:**
Adds all modified and new files in the current directory to the staging area for the next commit.

**Output Screenshot:**
![git init screenshot](addAll.png)

### git add -p

**Purpose:**
Stages changes in parts instead of the entire file.


**Output Screenshot:**
![git init screenshot](add_-p.png)

### git restore

**Purpose:**
It brings the file back to the last committed version.

**Output Screenshot:**
![git init screenshot](restore.png)

### git restore --staged

**Purpose:**
It removes a file from the staging area but keeps the changes in your working directory.


**Output Screenshot:**
![git init screenshot](add_stagged.png)

### git rm

**Purpose:**
It deletes the file and prepares Git to record that deletion.

**Output Screenshot:**
![git init screenshot](remove.png)

### git mv

**Purpose:**
git mv is used to rename or move a file/folder and tell Git about the change in one step.

**Output Screenshot:**
![git init screenshot](move_rename.png)

## git Management commands
### git branch
**Purpose:**
to know on which you are currently present 

**Output Screenshot:**
![git init screenshot](Branch.png)

### git branch -a
**Purpose:**
list out all the branches ,incuding local and remote branches

**Output Screenshot:**
![git init screenshot](branch_-a.png)

### git branch -d

**Purpose:**
It only deletes the branch if it has been fully merged with the branch you’re currently on (usually main).

**Output Screenshot:**
![in my repository there is no feature-login ranch so it was unable find it](del_branch.png)



