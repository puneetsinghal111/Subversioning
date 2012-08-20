<?php
// Name of Topic:- Introduction to Subversion (Getting started with svn)
//
//Points for Presentation
//
//		1.0 	A little bit of theory
//    			1.1		Overview of Subversion
//    			1.2 		Subversion approach to Version Control
//
//		2.0 	Using Subversion
//    			2.1		Typical subversion usage and workflow
//    			2.2		Examples using mock repository
//
//		3.0	Branching and merging
//    			3.1		Creating branches, keeping branches in sync, merging back
//    			3.2		Backing out merges
//
//
//What is subversion?
//		Subversion is a free/open source version control system. That is, Subversion manages files and directories, 
//		and the changes made to them, over time. Some version control systems are also software configuration 
//		management (SCM) systems. These systems are specifically tailored to manage trees of source code and 
//		have many features that are specific to software development— such as natively understanding programming languages, 
//		or supplying tools for building software. Subversion, however, is not one of these systems.
//
//
//Obtaining a working copy of the repository :-
//		A Subversion working copy is an ordinary directory tree on your local system. A working copy also contains some extra files, 
//		created and maintained by Subversion, to help it carry out these commands. In particular, each directory in your working copy 
//		contains a subdirectory named .svn, also known as the working copys administrative directory. 
//		To get a working copy, you check out some subtree of the repository.
//
//		$ svn co http://svn.apache.org/repos/asf/subversion/trunk subversion
//
//
//Pushing and pulling changes from repository :-
//		Your working copy is your own private work area: Subversion will never incorporate other peoples changes, nor make your own 
//		changes available to others, until you explicitly tell it to do so. To push your changes to the repository, you can use 
//		Subversions svn commit command:
//
//		$ svn commit README -m "Fixed a typo in README."
//
//To pull changes from the repository into your working copy, use svn update command:
//
//		$ svn update
//
//
//Revisions :-
//		An svn commit operation publishes changes to any number of files and directories as a single atomic transaction. Each time the 
//		repository accepts a commit, this creates a new state of the filesystem tree, called a revision.
//
//
//Basic work cycle :-
//
//In case of doubt :
//    svn help
//
//Update your working copy :
//    svn checkout
//    svn update
//
//Make changes :
//     svn add
//    svn delete
//    svn copy
//    svn move
//    svn mkdir
//
//Examine your changes :
//    svn status
//    svn diff
//
//Undo changes :
//    svn revert
//
//Resolve conflicts (merge others' changes) :
//    svn update
//    svn resolve
//Commit your changes :
//    svn commit
//
//Examining history :
//    svn log
//    svn diff
//    svn cat
//    svn ls
//
//Cleaning up :
//    svn cleanup
//
//Other useful commands :
//    svn annotate
//    svn blame
//    svn praise
//    svn info
//
//
//
//
//Branching and merging :-
//	Subversion handles branches differently:
//		First, Subversion has no internal concept of a branch—it knows only how to make copies. When you copy a directory, 
//		the resultant directory is only a "branch" because you attach that meaning to it.
//
//		Second, because of this copy mechanism, Subversion's branches exist as normal filesystem directories in the repository. 
//		This is different from other version control systems, where branches are typically defined by adding extra-dimensional 
//		"labels" to collections of files.
//
//
//
//Creating a branch
//		To create a branch you make a copy of the project in the repository using the svn copy command.
//
//		$ svn copy http://svn.example.com/repos/calc/trunk \
//				http://svn.example.com/repos/calc/branches/my-calc-branch \
//				-m "Creating a private branch of /calc/trunk"
//
//Basic merging
//		Replicating changes from one branch to another is performed using various invocations of the svn merge command. 
//		Frequently keeping your branch in sync with trunk helps prevent conflicts 
//		when it comes time for you to fold your changes back into the trunk.
//
//    First ensure that your branch working copy is "clean" (has no local changes) and then run:
//
//$ svn merge http://svn.example.com/repos/calc/trunk
//
//svn status and svn diff show what changes were merged.
//Build and test your working copy. Once satisfied, svn commit the changes to your branch.
//
//
//Roll back changes :-
//An extremely common use for svn merge is to roll back a change that has already been committed. All you need to do is to specify a reverse difference.
//$ svn merge -r 303:302 http://svn.example.com/repos/calc/trunk
//
//By using the -r option, you can ask svn merge to apply a changeset, or a whole range of changesets, to your working copy. 
//	In our case of undoing a change, we're asking svn merge to apply changeset #303 to our working copy backward.